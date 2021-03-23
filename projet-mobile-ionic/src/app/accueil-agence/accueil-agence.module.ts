import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { AccueilAgencePageRoutingModule } from './accueil-agence-routing.module';

import { AccueilAgencePage } from './accueil-agence.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    AccueilAgencePageRoutingModule
  ],
  declarations: [AccueilAgencePage]
})
export class AccueilAgencePageModule {}
