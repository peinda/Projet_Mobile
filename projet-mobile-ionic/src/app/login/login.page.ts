import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  todo = {};
  logForm() {
    console.log(this.todo);
  }
  constructor() { }

  ngOnInit() {
  }

}
