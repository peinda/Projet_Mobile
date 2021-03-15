import { Injectable } from '@angular/core';
import {UserServicesService} from './user-services.service';
import {ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot} from '@angular/router';
import {HttpClient} from '@angular/common/http';
import {Storage} from '@ionic/storage';

@Injectable({
  providedIn: 'root'
})
export class AuthGuardService implements CanActivate {
  constructor(private router: Router, private userSrv: UserServicesService, private storage: Storage) { }
  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
   if (this.userSrv.isAuthenticate()){
      return true;
   }
   this.router.navigate(['/login']);
   return false;
  }

}
