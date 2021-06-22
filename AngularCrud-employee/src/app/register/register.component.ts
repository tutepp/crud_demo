import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { UserService } from '../user.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css'],
})
export class RegisterComponent implements OnInit {
  registerForm = this.formBuilder.group({

    "firstName":["",[Validators.required , Validators.pattern(/^[a-zA-Z ]+$/)]]
      })


  constructor(private userService: UserService , private formBuilder: FormBuilder) {}

  ngOnInit(): void {}




  onSubmit() {
    this.userService.register(this.registerForm.value).subscribe({
      next: (data: any) => {
        console.log(data);
      },
      error: (error: any) => {
        console.log(error);
      },
    });
  }
}
