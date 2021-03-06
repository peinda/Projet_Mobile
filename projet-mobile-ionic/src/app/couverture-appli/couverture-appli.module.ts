import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CouvertureAppliPageRoutingModule } from './couverture-appli-routing.module';

import { CouvertureAppliPage } from './couverture-appli.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CouvertureAppliPageRoutingModule
  ],
  declarations: [CouvertureAppliPage]
})
export class CouvertureAppliPageModule {}
