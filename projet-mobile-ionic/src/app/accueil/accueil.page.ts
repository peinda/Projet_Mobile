import { Component, OnInit } from '@angular/core';
import {UserServicesService} from '../Services/user-services.service';
import {HttpClient} from '@angular/common/http';
import {DepotsService} from '../Services/depots.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-accueil',
  templateUrl: './accueil.page.html',
  styleUrls: ['./accueil.page.scss'],
})
export class AccueilPage implements OnInit {
  dataRetrait:any;
  constructor(private userSrv: UserServicesService, private depotSrv: DepotsService, private router: Router) { }

  ngOnInit() {
  }

  deconnexion() {
    this.userSrv.logout();
  }

}
