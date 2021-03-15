import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-retrait',
  templateUrl: './retrait.page.html',
  styleUrls: ['./retrait.page.scss'],
})
export class RetraitPage implements OnInit {
  hide = false;

  constructor() { }

  ngOnInit() {
  }
  ShowAndHide(data: any)
  {
    // tslint:disable-next-line:triple-equals
    this.hide = data == 1 ? false : true;
  }
  // @ts-ignore
  Depot();
}
