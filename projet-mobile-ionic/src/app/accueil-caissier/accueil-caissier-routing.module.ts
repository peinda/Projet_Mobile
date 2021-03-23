import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AccueilCaissierPage } from './accueil-caissier.page';

const routes: Routes = [
  {
    path: '',
    component: AccueilCaissierPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AccueilCaissierPageRoutingModule {}
