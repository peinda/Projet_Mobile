import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { DepotsPageRoutingModule } from './depots-routing.module';

import { DepotsPage } from './depots.page';

@NgModule({
    imports: [
        CommonModule,
        FormsModule,
        IonicModule,
        DepotsPageRoutingModule,
        ReactiveFormsModule
    ],
  declarations: [DepotsPage]
})
export class DepotsPageModule {}
