import { Component, OnInit } from '@angular/core';
import {FormGroup} from '@angular/forms';

@Component({
  selector: 'app-calculatrice',
  templateUrl: './calculatrice.page.html',
  styleUrls: ['./calculatrice.page.scss'],
})
export class CalculatricePage implements OnInit {
  calcForm: FormGroup;
  constructor() { }

  ngOnInit() {
  }
  // @ts-ignore
  onSubmit();
}
