import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {UserServicesService} from '../Services/user-services.service';
import {Router} from '@angular/router';
import {Storage} from '@ionic/storage';
import {HomePageModule} from '../home/home.module';
import {AccueilCaissierPageModule} from '../accueil-caissier/accueil-caissier.module';
import {AccueilAgencePageModule} from '../accueil-agence/accueil-agence.module';
import {AccueilUserPageModule} from '../accueil-user/accueil-user.module';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  loginForm: FormGroup;
  loading = false;
  submitted = false;
  // tslint:disable-next-line:no-shadowed-variable
  constructor(private formBuilder: FormBuilder, private userSrv: UserServicesService, private router: Router, private storage: Storage) { }

  ngOnInit() {
    this.loginForm = this.formBuilder.group({
        telephone: ['', [Validators.required, Validators.pattern('7[7|6|8|0|5][0-9]{7}$')]],
        password: ['', [Validators.required, Validators.minLength(6)]],
      }
    );
  }
  get f() { return this.loginForm.controls; }

  // @ts-ignore
  onSubmit(){
    this.submitted = true;
    if (this.loginForm.invalid){
      return null;
    }
    console.log(this.loginForm.value);
    // console.log(this.loginForm.value);
    this.userSrv.authentif(this.loginForm.value).subscribe(
     data => {
        console.log(data);
        this.storage.set('token', data.token);
        this.userSrv.subject.next(true);
        const tokenDecode = this.userSrv.decodeToken(data.token);
        console.log(tokenDecode);
       // tslint:disable-next-line:triple-equals
        if ( tokenDecode.roles[0] == 'Admin_Systeme'){
         this.router.navigate(['/home']).then(r => HomePageModule);
       }if ( tokenDecode.roles[0] == 'Caissier'){
         this.router.navigate(['/accueil-caissier']).then(r => AccueilCaissierPageModule);
       }if ( tokenDecode.roles[0] == 'Admin_Agence'){
         this.router.navigate(['/accueil-agence']).then(r => AccueilAgencePageModule);
       }if ( tokenDecode.roles[0] == 'User_Agence'){
         this.router.navigate(['/accueil-user']).then(r => AccueilUserPageModule);
       }
       }
    );
  }
}
