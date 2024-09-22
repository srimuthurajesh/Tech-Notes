## Angular Forms
> handle users input as a form

1. Template Driven form
2. Reactive form

- need to import FormsModule or ReactiveFormsModule
### Building blocks of Angular forms
1. **formControl** - represents a single input field
```
let firstname= new FormControl(); //Creating a FormControl in a Reactive forms
firstname.value   //Returns the value of the first name field
firstname.errors      // returns the list of errors
firstname.dirty       // true if the value has changed (dirty)
firstname.touched     // true if input field is touched
firstname.valid       // true if the input value has passed all the validation
firstname.statusChanges.subscribe(x => {console.log('firstname status changes')});
firstname.valueChanges.subscribe(x => {console.log('firstname status changes')});
```
2. **formGroup** - is a collection of FormControls  
```
let address= new FormGroup({
    name : new FormControl({value: ‘Rahul’, disabled: true}),
    city : new FormControl(""),
    pinCode : new FormControl('', [Validators.required, Validators.minLength(6)], Validators.email])
})
reactiveForm.getValue('city');   //return formControl
reactiveForm.setValue({all inputs});
reactiveForm.patchValue({partial inputs});
reactiveForm.statusChanges.subscribe(x => {console.log('reactiveForm status changes')});
reactiveForm.valueChanges.subscribe(x => {console.log('reactiveForm status changes')});

address.value;       	// return json object
address.get("street")   // get formcontrol by name, inside formgroup
address.errors     	// returns the list of errors
address.dirty      	// true if the value of one of the child control has changed (dirty)
address.touched    	// true if one of the child control is touched
address.valid      	// true if all the child controls passed the validation
```
3. **formArray** : array of formControls


##### Template Driven form
```
<form #contactForm="ngForm" (ngSubmit)="onSubmit(contactForm)">
 	<input type="text" name="firstname" ngModel #fname="ngModel">
    	<button type="submit">Submit</button>
</form>
<!-- contactForm is formGroup, have methods like value, valid, touched,submitted -->
<!-- fname is formControl, have methods like value, valid, invalid,touched -->
```

##### Reactive Driven form
```
<form [formGroup]="contactForm" (ngSubmit)="onSubmit()">
	<input type="text" id="firstname" name="firstname" formControlName="firstname">
	<input type="text" id="lastname" name="lastname" [formControl]="lastname">
	<button type="submit">Submit</button>
</form>
```
##### FormBuilder
```
constructor(private formBuilder: FormBuilder) { }
this.contactForm = this.formBuilder.group({
  firstname: [''],
  lastname: [''],
  email: ['']
});
```

