# CASCADING STYLE SHEET:
- cascading refers to 	- CSS applies one style on top of another style
- stylesheets refers to 	- control look and feel of web documents

### THREE WAYS TO INSERT CSS:
1. Inline   				`<p style="color:blue; margin-left:40px;">Hello CSS</p>`    
2. Internal(embedded)   	`<head><style>  p{color:blue}  </style></head>`    
3. External	 			`<head><link rel="stylesheet" type="text/css" href="style.css"> </head>`    
	
### Cascading Hierrachy :	
1. Inline css,
2. Externa&internal css
3. Browser default 
	
## COLOR: 
> 150 standard colors https://www.w3schools.com/colors/colors_names.asp

we can give color by,  	
1. By a color name. 		color: blue;
2. By hexadecimal value	color: #9000A1;
3. By RGB				color: rgb{0,220,98};
4. By RGBA				color: rgba(255,99,71,0);
5. By HSL				color: hsl(hue,saturation,lightness);
6. By HSLA				color: hsla(hue,saturation,lightness,alpha)

### CSS UNITS:
1. em - current font size-1em
2. %  - current font size - 100%
3. px - one pixel in screen
4. pt - points used in print media- 0.72inch = 1pt


## CSS PROPERTIES:
### BACKGROUND:
1. background-color: #b0d4de; 
2. background-image: url("paper1.gif");
3. background-repeat: repeat-x; background-repeat: repeat-y;background-repeat: no-repeat;    
4. background-attachment:fixed;   background-attachment:scrolled;
5. background-position:centre; /* top, left, right bottom*/
6. shorthand=  background: #ffffff url("img_tree.png") no-repeat right top;
7. background-clip: border-box;	background-clip: padding-box;	background-clip: content-box;	//background filling upto
8. background-origin: border-box;	background-origin: padding-box;	background-origin: content-box;	//background filling from
9. background-size: auto;			backgrounf-size: 100px 200px;									//background image size

### BORDER:
1. border-style : dotted,dashed,solid,double,groove,ridge,inset,outse,none,hide
2. border-top-style:dotted; border-right-style:dotted; border-left-style:dotted; border-bottom-style:solid;		
3. border-width : 2px 4px;
4. border-color : red;
5. shorthand= border:5px solid black;
6. border-radius:5px;		/* we can create a circle */  

### MARGIN:
margin:10px; margin-top:auto; margin:inherit;  

### PADDING:
padding:10px; padding-top:auto; padding:inherit;  
box-sizing:border-box;	/*will not increase div width becz of paddings*/  

### HEIGHT & WIDTH:
max-width 400px; min-height:auto;	//if screen minimize it will not go beyond those height width

### BOX MODEL:
1. Html element consider as box in order of margin-> border-> padding-> content		
2. Total width	 = (margin-left)+(margin-right)	+(padding-left)	+(padding-right) +content width	
3. Total height = (margin-top)	+(margin-bottom)+(padding-top)	+(padding-bottom)+content height	

### OUTLINE:
1. It locates above border. Its size wil no effect in box model, but outline will increase decrease in size
2. outline-style : dotted,dashed,solid,double,groove,ridge,inset,outset,none,hidden
3. outline-color : red; outline-width:10px;
4. shorthand= outline : 3px solid red;
5. outline-offset : 10px;	adds a space between outline and border

### TEXT:	
1. text-align : center,rigth,left,justify;			/*also apply for div inside div,img etc*/
2. text-decoration: overline,line-through,underline;
3. text-transform: uppercase,lowercase,captilize
4. text-indent : 5px;	/*first line auto tab space */ 
5. letter-spacing : 3px; word-spacing : 3px; line-height : 1.8;
6. direction : rtl;
7. text-shadow : 3px 2px red;
8. text-overflow : clip,ellipsis,"---","..."
9. white-space: nowrap, normal,pre;

### FONT:
1. Two types of font family: 1.generic familty 2.font family
2. font-style : normal,italic,oblique;
3. font-size : 10px;
4. font-weight : normal, bold;
5. font-variant : normal,small-caps,initial,inherit

### CSS LINKS:
a:link a:visited a:hover a:active {color:red}  

### LISTS:
1. list-style-type: lower-alpha, circle, square,none; 
2. list-style-image: url("logo.jpg"), none; /* that picture */
3. list-style-position: inside,outside;

### DISPLAY:
1. Block level elements  - <div><h><p><fieldset><form><hr><li><ol><ul><table><pre>
2. Inline level elements - <span><a><img>
3. display : block			/*cover entire horizontal*/	
4. display : inline		/*cover only the content horizontal*/
5. display : inline-block	/*behave like inline, but we can appy width*/
6. display : none			/*removed from Dom*/
7. visibility : none 		/*just hide from Dom*/

### POSITION:
1. position : static;		/*default html elements position*/
2. position : relative;	/*position relative to its default position*/
3. position : fixed;		/*position fixed to the browser or viewport*/
4. position : absolute;	/*should have parent as relative-position elemtn, otherwise it beacome fixed, parent element as browser*/
5. position : sticky;		/*will not scroll even if it get out of scrolled out of page*/
6. z-index : -1;			/*can overlap position to anything*/

### CSS OVERFLOW:
1. overflow: visible,hidden,scroll,auto(increase div size to text);	/*not only text, it is also apply for image*/
2. overflow-x : hidden; overflow-y : scroll;

### FLOAT:
1. float : rigth,left,none,inherit;
2. clear :left,right,both,none;  /*can control which side we can avoid element can be float*/

### CSS COMBINATORS:
1. descendant selector (space)		div p {color:red}	
2. child selector (>)				div>p {color:red}
3. adjacent sibling selector (+)	div+p {color:red} 
4. general sibling selector (~)	div~p {color:red}

  
