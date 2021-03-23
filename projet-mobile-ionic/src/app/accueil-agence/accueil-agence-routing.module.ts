import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AccueilAgencePage } from './accueil-agence.page';

const routes: Routes = [
  {
    path: '',
    component: AccueilAgencePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AccueilAgencePageRoutingModule {}
