import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {HttpClient} from '@angular/common/http';
import {DepotsService} from '../Services/depots.service';
import {AlertController} from '@ionic/angular';
import {Router} from '@angular/router';

@Component({
  selector: 'app-retrait',
  templateUrl: './retrait.page.html',
  styleUrls: ['./retrait.page.scss'],
})
export class RetraitPage implements OnInit {
  show=true;
  hide = false;
  retraitForm: FormGroup;
  codeTrans: "";
  dateRetrait:any;
  dateDepot:any;
  dataCode={
    "montant": '',
    "dateDepot": '',
    "dateRetrait":'',
    "userRetrait": '',
    "clientDepot": {
      "nomComplet": '',
      "telephone": '',
      "numCni": ''
    },
    "clientRetrait": {
      "nomComplet": '',
      "telephone": '',
      "numCni": ''
    },
    "compteRetrait": {
      "solde": '',
    }
  };
  dataRetrait:any;

  constructor(private formBuilder: FormBuilder,private router:Router,
              private http: HttpClient, private depotSrv: DepotsService, private alertCtrl: AlertController) { }

  ngOnInit() {
    this.retraitForm = this.formBuilder.group({
      clientRetrait:this.formBuilder.group({
      numCni: ['', [Validators.required, Validators.pattern('[0-9]{13}')]],
      codeTrans: ['',[ Validators.required, Validators.pattern('[0-9]{3}\-[0-9]{3}\-[0-9]{3}$')]]
      } )
  }
  );
    this.retraitForm.get('clientRetrait').get('codeTrans').valueChanges.subscribe(
      async code=>{
        if(this.retraitForm.get('clientRetrait').get('codeTrans').valid){

          this.depotSrv.infobyCode(code).subscribe(
            data=>{
              this.dataCode=data
              console.log(data);
            }
          )

        } else {
          const alertcodeTrans = await this.alertCtrl.create({
            cssClass: 'my-custom-class',
            header: 'retrait refusé',
            message: 'le code nest pas correct' ,
            buttons: ['ok']
          });

          await alertcodeTrans.present();        }
      }
    )
  }
  ShowAndHide(data: any)
  {
    // tslint:disable-next-line:triple-equals
    this.hide = data == 1 ? false : true;
  }

  GetRetrait() {
    if(this.retraitForm.valid){
      // @ts-ignore
      this.depotSrv.retrait(this.retraitForm.value).subscribe(
        async (data)=>{
          this.dataRetrait=data
          console.log(data);

            const alert = await this.alertCtrl.create({
              cssClass: 'my-custom-class',
              header: 'Confirmation',
              message: `BENEFICIAIRE <br> <strong>${data.clientRetrait.nomComplet}</strong> <br>
                TELEPHONE <br> <strong></strong>${data.clientRetrait.telephone} <br>
                N°CNI <br> <strong></strong>${data.clientRetrait.numCni} <br>
                MONTANT REÇU <br> <strong>${data.montant}</strong> fcfa <br>
                EMETTEUR <br> <strong>${data.clientDepot.nomComplet}</strong> <br>
                TELEPHONE <br> <strong>${data.clientDepot.telephone}</strong> `,
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
                    console.log('Cancel clicked');
                  }
                }
              ]
            })
              this.router.navigate(['accueil']);

            alert.present();
        }
      )
    }
  }}
