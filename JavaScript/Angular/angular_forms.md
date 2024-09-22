## Angular Forms
> handle users input as a form

## Types of Angular Forms
1. Template Driven Forms
- Simple to use, suitable for small forms.
- Utilizes Angular directives in the template.
- Forms are created and managed using Angular's ngForm directive.

2. Reactive Forms  
- More robust, ideal for complex forms.
- Based on reactive programming principles.
- Provides a model-driven approach where form controls are created in the component class.

## Modules to Import
1. For Template Driven Forms, import FormsModule.
2. For Reactive Forms, import ReactiveFormsModule.

## Core concepts of Angular forms
### 1. FormControl  
> represents a single input field

  ```
    let firstname = new FormControl(); // Create a FormControl
    console.log(firstname.value);        // Get the current value
    console.log(firstname.errors);       // Get validation errors
    console.log(firstname.dirty);        // Check if the value has changed
    console.log(firstname.touched);      // Check if the field has been touched
  ```  
### 2. FormGroup  
> is a collection of FormControls  
  
  ```
  let address = new FormGroup({
    name: new FormControl({ value: 'Rahul', disabled: true }),
    city: new FormControl(""),
    pinCode: new FormControl('', [Validators.required, Validators.minLength(6), Validators.email])
  });
  console.log(address.value);            // Get the form values as a JSON object
  console.log(address.get("city"));       // Access specific FormControl
  ```  
### 3. formArray
> array of formControls

```
let phoneNumbers = new FormArray([
    new FormControl(''),
    new FormControl('')
]);
```

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
> A convenient way to create forms.

```
constructor(private formBuilder: FormBuilder) { }
this.contactForm = this.formBuilder.group({
  firstname: [''],
  lastname: [''],
  email: ['']
});
```

### Validation
> required, minLength, maxLength, and custom validators can also be created.

```
let emailControl = new FormControl('', [Validators.required, Validators.email]);
```

### Subscribing to Value Changes
1. firstname.statusChanges.subscribe(x => {console.log('firstname status changes')});  
2. firstname.valueChanges.subscribe(x => {console.log('firstname status changes')});