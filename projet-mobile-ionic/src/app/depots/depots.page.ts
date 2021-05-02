import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {HttpClient} from '@angular/common/http';
import {DepotsService} from '../Services/depots.service';
import {TransactionModel} from '../Services/transaction.model';
import {AlertController} from '@ionic/angular';
import {Router} from '@angular/router';

@Component({
  selector: 'app-depots',
  templateUrl: './depots.page.html',
  styleUrls: ['./depots.page.scss'],
})
export class DepotsPage implements OnInit {

  constructor(private formBuilder: FormBuilder, private router: Router,
              private http: HttpClient, private depotSrv: DepotsService, private alertCtrl: AlertController) { }
  hide = false;
  ClientDepot: FormGroup;
  ClientRetrait: FormGroup;
  submitted = false;
  public frais: number;
  public total: number;
  private transMdl: TransactionModel;
  depot: any;

  ngOnInit() {
    this.ClientDepot = this.formBuilder.group(
      {
        nomComplet: ['', Validators.required],
        numCni: ['', Validators.required],
        telephone: ['', Validators.required, Validators.pattern('7[7|6|8|0|5][0-9]{7}$')],
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
  async Depot() {
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

  const alert = await this.alertCtrl.create({
      cssClass: 'my-custom-class',
      header: 'Confirmation',
      message: `EMETTEUR <br> <strong>${valueDepot.nomComplet}</strong> <br>
                TELEPHONE <br> <strong>${valueDepot.telephone}</strong> <br>
                N°CNI <br> <strong>${valueDepot.numCni}</strong> <br>
                MONTANT <br> <strong>${valueDepot.montant}</strong> fcfa <br>
                RECEPTEUR <br> <strong>${valueRetrait.nomComplet}</strong> <br>
                TELEPHONE <br> <strong>${valueRetrait.telephone}</strong> `,
      buttons: [
        {
          text: 'annuler',
          role: 'annuler',
          cssClass: 'secondary',
          handler: (blah) => {
            console.log('Confirm Cancel: blah');
          }
        },
        {
          text: 'Confirmer',
          handler: () => {
            this.depotSrv.postDepot(transMdl).subscribe(
              async data => {
                console.log(data);
                const alertcodeTrans = await this.alertCtrl.create({
                  cssClass: 'my-custom-class',
                  header: 'Transfert réussi',
                  message: 'le code de transaction du transfert est : ' + data.codeTrans ,
                  buttons: ['ok']
                })
                this.router.navigate(['accueil']);

                await alertcodeTrans.present();
                {
                  this.ClientDepot.reset();
                  this.ClientRetrait.reset();
                }
              });
          }
        }
      ]
    });

  await alert.present();
      }
  }

