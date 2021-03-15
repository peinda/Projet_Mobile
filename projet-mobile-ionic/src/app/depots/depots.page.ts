import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {HttpClient} from '@angular/common/http';
import {DepotsService} from '../Services/depots.service';
import Swal from 'sweetalert2';
import {TransactionModel} from '../Services/transaction.model';

@Component({
  selector: 'app-depots',
  templateUrl: './depots.page.html',
  styleUrls: ['./depots.page.scss'],
})
export class DepotsPage implements OnInit {
  constructor(private formBuilder: FormBuilder,
              private http: HttpClient, private depotSrv: DepotsService) { }
  hide = false;
  ClientDepot: FormGroup;
  ClientRetrait: FormGroup;
  submitted = false;
  public frais: number;
  public total: number;
  private transMdl: TransactionModel;

  ngOnInit() {
    this.ClientDepot = this.formBuilder.group(
      {
        nomComplet: ['', Validators.required],
        numCni: ['', Validators.required],
        telephone: ['', Validators.required],
        montant: ['', Validators.required],
      });

    this.ClientRetrait = this.formBuilder.group(
      {
        nomComplet: ['', Validators.required],
        telephone: ['', Validators.required],

      });
    this.ClientDepot.get('montant').valueChanges.subscribe(
      mnt => { if (Number(mnt) && mnt > 0 && mnt.trim() !== '')
      { this.total = mnt; this.http.get(`${this.depotSrv.baseUrl}/user/frais/${mnt}`).subscribe(
        (res: any) => {
          this.frais = res.frais; this.total = +mnt + (+res.frais);
        });
      }
      else{ this.total = 0; this.frais = 0;
      }
      });
  }
  ShowAndHide(data: any)
  {
    // tslint:disable-next-line:triple-equals
    this.hide = data == 1 ? false : true;
  }
  // @ts-ignore
  Depot() {
  this.submitted = true;
  const valueDepot = this.ClientDepot.value;
  const valueRetrait = this.ClientRetrait.value;
  // @ts-ignore
  const transMdl: TransactionModel = {
    montant: +valueDepot.montant,
    clientDepot: {
        nomComplet: valueDepot.nomComplet,
        numCni: valueDepot.numCni,
        telephone: valueDepot.telephone,
      },
    clientRetrait: {
        nomComplet: valueRetrait.nomComplet,
        telephone: valueRetrait.telephone,
    }
  };

  this.depotSrv.postDepot(transMdl).subscribe(
      data => {
        console.log(data);
        {
           this.ClientDepot.reset();
           this.ClientRetrait.reset();
           Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          });
        }
         });
      }
  }

