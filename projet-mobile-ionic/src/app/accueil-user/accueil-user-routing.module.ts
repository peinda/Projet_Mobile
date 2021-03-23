import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AccueilUserPage } from './accueil-user.page';

const routes: Routes = [
  {
    path: '',
    component: AccueilUserPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AccueilUserPageRoutingModule {}
