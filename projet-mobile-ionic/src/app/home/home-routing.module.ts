import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomePage } from './home.page';

const routes: Routes = [
  {
    path: '',
    component: HomePage,
    children: [
      {
        path: 'accueil',
        loadChildren: () => import('../accueil/accueil.module').then( m => m.AccueilPageModule)
      },
      {
        path: '',
        redirectTo: 'accueil',
        pathMatch: 'full'
      },
      {
        path: 'transactions',
        loadChildren: () => import('../transactions/transactions.module').then( m => m.TransactionsPageModule)
      },
      {
        path: 'commissions',
        loadChildren: () => import('../commissions/commissions.module').then( m => m.CommissionsPageModule)
      },
      {
        path: 'calculatrice',
        loadChildren: () => import('../calculatrice/calculatrice.module').then( m => m.CalculatricePageModule)
      }
    ]
  },
  {
    path: '',
    redirectTo: 'accueil',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class HomePageRoutingModule {}
