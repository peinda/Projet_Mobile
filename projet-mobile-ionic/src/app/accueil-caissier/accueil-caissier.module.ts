import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { AccueilCaissierPageRoutingModule } from './accueil-caissier-routing.module';

import { AccueilCaissierPage } from './accueil-caissier.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    AccueilCaissierPageRoutingModule
  ],
  declarations: [AccueilCaissierPage]
})
export class AccueilCaissierPageModule {}
