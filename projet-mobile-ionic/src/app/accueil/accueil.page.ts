import { Component, OnInit } from '@angular/core';
import {UserServicesService} from '../Services/user-services.service';

@Component({
  selector: 'app-accueil',
  templateUrl: './accueil.page.html',
  styleUrls: ['./accueil.page.scss'],
})
export class AccueilPage implements OnInit {

  constructor(private userSrv: UserServicesService) { }

  ngOnInit() {
  }

  deconnexion() {
    this.userSrv.logout();
  }

}
