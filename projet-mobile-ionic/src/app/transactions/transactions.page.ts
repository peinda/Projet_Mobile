import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-transactions',
  templateUrl: './transactions.page.html',
  styleUrls: ['./transactions.page.scss'],
})
export class TransactionsPage implements OnInit {
  hide = false;

  constructor() { }

  ngOnInit() {
  }
  ShowAndHide(data: any)
  {
    // tslint:disable-next-line:triple-equals
    this.hide = data == 1 ? false : true;
  }

}
