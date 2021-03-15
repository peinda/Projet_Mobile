import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { DepotsPage } from './depots.page';

const routes: Routes = [
  {
    path: '',
    component: DepotsPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class DepotsPageRoutingModule {}
