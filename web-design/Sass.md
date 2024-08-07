## Sass - Syntactically Awesome Style Sheet

### INSTALLATION:
```
	*ruby and gem required
	sudo apt-get install ruby-dev
	sudo gem install sass
	sass -v
```
### EXECUTION:
1. sass main.scss main.css		//comment to create css file from scss file
2. sass folderName				//to convert entire folder to css file from scss file	
3. sass --watch main.scss:main.css
4. sass --watch folderName
5. sass-convert main.scss main.sass		//convert scss file to sass(file without bracket)


### VARIABLES:
```
$primary-color : green;		//declaring variables
.sampleId{
	color: $primary-color;	
}
```
> string quotes should use unquote() function.    eg:$text-alignment:unquote('left');

### NESTING:
> we use css nesting as .container p{ }, .container ul{  } container ul li{  }
```
we can use scss nestings as
		.container{
			width:70%;
			p{
				color:red;				
			}
			ul{
				list-style:none;
				li{
					display:inline;
				}
			}
		}
```
### PARTIAL:
> partial file name should start with underscore. eg:"_nav.scss"

### IMPORT:
> @import 'nav';		//we can import partial file, no need of underscore and .scss in partial filename

### MIXINS:
```
@mixin border-radius($radius){			//mixins declarations
	-webkit-border-radius:$radius;
	-moz-border-radius:$radius;
	-ms-border-radius:$radius;	
}
h1{
	@include border-radius(2px);	// we can call mixins as like this
}
```		

### INHERITANCE EXTEND:
```
.container{
	width:10px;height:10px;background-color:grey;	
}
.success{
	@extend .container			//extending all properties from container
	background-color:red;		//overriding background color values	
}
.warning{
	@extend .container
	background-color:orange;	
}
```


