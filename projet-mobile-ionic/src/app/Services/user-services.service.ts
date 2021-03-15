import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
// @ts-ignore
import {JwtHelperService} from '@auth0/angular-jwt';
import {Storage} from '@ionic/storage';
import {subscribeTo} from 'rxjs/internal-compatibility';
import {Router} from '@angular/router';
import {BehaviorSubject} from 'rxjs';




@Injectable({
  providedIn: 'root'
})
export class UserServicesService {
  subject = new BehaviorSubject(false);
  helpers: any;
  public baseUrl = 'https://localhost:8000';
  public authentifUrl = '/api/login_check';
  constructor(private http: HttpClient, private storage: Storage, private router: Router) {}
    httpOption = {
      headers: new HttpHeaders(
        {
          'Content-Type': 'application/json'
        })
    };
  authentif(user: any){
    return this.http.post<any>(this.baseUrl + this.authentifUrl, user, this.httpOption);
  }
  // @ts-ignore
  getTokenOnIonicStorage(){
    return this.storage.get('token').then(
      (token) => {
        return token;
      }
    );
  }
  decodeToken(token: any){
    this.helpers = new JwtHelperService();
    return this.helpers.decodeToken(token);
  }
  logout(){
    this.storage.remove('token');
    this.router.navigate(['/login']);
    this.subject.next(false);
    console.log(this.isAuthenticate());
  }
  isAuthenticate(){
    return this.subject.value;
  }
}
