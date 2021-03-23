import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {HttpClient} from '@angular/common/http';
import {DepotsService} from '../Services/depots.service';
import {TransactionModel} from '../Services/transaction.model';
import {AlertController} from '@ionic/angular';


@Component({
  selector: 'app-calculatrice',
  templateUrl: './calculatrice.page.html',
  styleUrls: ['./calculatrice.page.scss'],
})
export class CalculatricePage implements OnInit {
  CalcForm: FormGroup;
  frais: any;
  submitted = false;
  private transMdl: TransactionModel;
  // tslint:disable-next-line:max-line-length
  constructor(private formBuilder: FormBuilder,  private http: HttpClient, private depotSrv: DepotsService, private alertCtrl: AlertController) {
  }
  ngOnInit() {
    this.CalcForm = this.formBuilder.group(
      {
        montant: ['', Validators.required]
      });
  }
  // @ts-ignore
  async calc() {
    let {frais}=<any> await this.http.get(`${this.depotSrv.baseUrl}/user/frais/${this.CalcForm.get('montant').value}`).toPromise()
  console.log(frais);

    const alertcodeTrans = await this.alertCtrl.create({
      cssClass: 'my-custom-class',
      header: 'Calculateur',
      message: 'le frais du montant saisi est : ' + frais ,
      buttons: ['ok']
    });

    await alertcodeTrans.present();
    }
}
