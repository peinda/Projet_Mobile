import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import {AuthGuardService} from './Services/auth-guard.service';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full'
  },
  {
    path: 'couverture-appli',
    loadChildren: () => import('./couverture-appli/couverture-appli.module').then( m => m.CouvertureAppliPageModule)
  },
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'accueil',
    loadChildren: () => import('./accueil/accueil.module').then( m => m.AccueilPageModule), canActivate: [AuthGuardService]
  },
  {
    path: 'transactions',
    loadChildren: () => import('./transactions/transactions.module').then( m => m.TransactionsPageModule), canActivate: [AuthGuardService]
  },
  {
    path: 'commissions',
    loadChildren: () => import('./commissions/commissions.module').then( m => m.CommissionsPageModule), canActivate: [AuthGuardService]
  },
  {
    path: 'calculatrice',
    loadChildren: () => import('./calculatrice/calculatrice.module').then( m => m.CalculatricePageModule), canActivate: [AuthGuardService]
  },
  {
    path: 'depots',
    loadChildren: () => import('./depots/depots.module').then( m => m.DepotsPageModule), canActivate: [AuthGuardService]
  },
  {
    path: 'retrait',
    loadChildren: () => import('./retrait/retrait.module').then( m => m.RetraitPageModule), canActivate: [AuthGuardService]
  }
  ];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
