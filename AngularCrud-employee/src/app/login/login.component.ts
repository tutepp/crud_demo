import { LoginService } from '../login.service';
import { Employee } from '../employee';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { FormControl, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  login:FormGroup = new FormGroup({
email: new FormControl(),
password: new  FormControl()


  });

  constructor(private loginService: LoginService,
    private router: Router) { }

  ngOnInit(): void {
    // this.getToken();
    // console.log(this.result);
  }

  onSubmit(){
    console.log(this.login)
  }

  // getToken() {
  //   this.loginService.login(this.email, this.password).subscribe(
  //     data => {
  //       console.log(data);
  //       console.log(data.token);
  //       this.result = data;
  //     },
  //     error => console.log(error));
  // }

}
