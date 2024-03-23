Jquery

```
<script src=”jquery-1.11.3.js”></script>
<script src=”file////c::/Users/Rajesh”/Desktop/jquery-1.11.3.js”></script>
<script type=”text/javascript”>
	$(document).ready(function ()    {
                                  …………….
                                  ……………..}
);
	$(document).ready(func_name());	
	$(funcname());
	jquery(funcname()); 				//u can use any syntax for document ready
</script>
```

whatever u doing in jquery, it should comes under $()ready(func);

$(window).load() -  load after all images, files loaded
$(document).ready()  -load after dom loaded, not wait for images files

different between class and id- know it

Selectors: 1.Basic 2.Hierarchy 3.Attribute 4.Form
1.Basic   
	Element-$(“h1”)   $(“h3”)
	Id -$(“#idname”)
	Class- $(“.classname”)
	Universal- $(“*”)
	Multiple(“h1,h2,h3”)

2.Hierarchy
child –used to select first children of parent $(“parent>child”)
decendant- select all which are decendant of ancestor  $(“ancestor descentant”)
next adjacent- select which are next to previous   $(“element+next adjacent”)
next siling- select siblings of current element  $(“element~sibling”)

ex.   
<script>
$(document).ready(function(){
		$(“div>h1”).click(function(){
alert(“hii clicked”);                   //if u click “welcom” it show alert if 
}); 				//u click “hello”  it not show alert becz welcome is direct child of div

$(“div>h1”).click(function(){
alert(“hii clicked”);           //it show alert becz both h1 is decendant of div
});
$(“div  +h3”).click(function(){        //if we click h3 alert will execute becz it is next to div
alert(“hii clicked”);           
});
$(“h4  ~h3”).click(function(){		//if h4 h3 are same children it get alert
alert(“hii clicked”);
});
});
</script>
</head><body>
	<div>
		<h1>welcome</h1> <h2>always</h2>
		<h3>click</h3>
</div>
<h3>goodmorning</h3>
	<div>
		<span>
		<h1> hello</h1>
		</span>
	</div>
</body>

3.Attribute Selector:
Attribute	$(“h1[id]”)	select element based on attribute
Equals	$(“h1[id=tagname]”)	select element based on value
Not Equals	$(“h1[id!=tagname]”)	select element which are not equal
Starts with	$(“h1[id^=’tag’]”)	select element start with given value
Ends with	$(“h1[id$=’name’]”)	select element ends with given value
Contains	$(“h1[id*=’tag’]”)	select element which contain part of given value
Contains word	$(”[id~=’tagname’]”)	select element which contain exactly same value

4.Forms Selector 
whenever the type is selected, it will perform following functions


1.<input type=”text”>hii</input>           $(“:text”).click(function(){ …………………….});
2.<input type=”button”></input>           $(“:button”).click(function(){…………………..});
3.<input type=”submit”>hii</input>     $(“:submit”).click(function(){ …………………….});
4.<input type=”reset”>hii</input>           $(“:reset”).click(function(){ …………………….});
5. <select multiple><option>hii</option> <option>hello</option></select>  $(“option:selected”).click(function………….});
6.  fooball<input type=”checkbox”/>cricket<input type=”checkbox”/>$(“input:checked”).click(function(){ ……………….});

Effercts:

 








<input type=”button” onclick=”hideme”/>  ||function hideme(){$(“#head1”).hide(2000);}
<input type=”button” onclick=”show me”/>||function showme(){$(“#head1”).show(“slow”);}
<input type=”button” onclick=”toggleme”/>||function toggleme(){$(“#head1”).toggle();} 
<input type=”button” onclick=”fadeoutme”/>  ||function fadeoutme(){$(“#head1”).fadeOut();}
<input type=”button” onclick=”show me”/>||function fadeinme(){$(“#head1”).fadeiIn();}
<input type=”button” onclick=”toggleme”/>||function fadetoggleme(){$(“#head1”).fadeToggle(5000);}
<input type=”button” onclick=”fadetome”/>  ||function fadetome(){$(“#head1”).fadeTo(2000,0.4);}
<input type=”button” onclick=”slidedownme”/>  ||function slidedownme(){$(“#head1”).slideDown(2000);}
<input type=”button” onclick=”slideupme”/>||function slideupme(){$(“#head1”).slideUp(“slow”);}
<input type=”button” onclick=”slidetoggleme”/>||function slidetoggleme(){$(“#head1”).slideToggle();}
<input type=”button” onclick=”stopme”/>  ||function stopme(){$(“#head1”).stop();}
<input type=”button” onclick=”animateme”/>  ||function animateme(){$(“#head1”).animate({left:’900px’,fontsize:’20px’},3000);
 		  $(“#head1”).animate({bottom:’-400px’,fontsize:’120px’},2000);}


Filters:
It is used to filter set of matched elements to match selector



	
Basic Filters:
First- used to select first element in page   $(“:first”)
Last- used to select last element $(“:last”)
Equals- used to select element which index value  $(“:eq(index)”)
Not- used to select element which do not match specified element $(“:not(selector)”)
Even- used to select which has even index  $(“:even(index)”)- 
Odd- used to select which has odd index $(“:odd(index)”)
Greate than- used to select which has index greater the specified index $(“:gt(index)”)
Lesser than-used to select which has index less than specified index $(“:lt(index)”)
Header- used to select all header from h1 to h6 $(“:header”)

<body>
<div style=”background-color:lightblue”>
<h1 id=”head1”>vanakam</h1>
<h1>namaste<h1>
<h1>namaskar<h1>
</div>	$(document).ready(function(){
$(“h1:first”).click(function(){alert(“vanakam is clicked”);});
$(“h1:last”).click(function(){alert(“namaskar is clicked”);});
$(“h1:eq(1)”).click(function(){alert(“namaste is clicked”);});
$(“h1:not(#head1)”).click(function(){alert(“vanakam is not clicked”);});
$(“:header”).click(function(){alert(“Header element is clicked”);});
$(“h1:gt(1)”).click(function(){alert(“namaskar is clicked”);});
$(“h1:lt(1)”).click(function(){alert(“vanakam is clicked”);});
$(“h1:even”).click(function(){alert(“vanakam and namaskar is clicked”);});
$(“h1:odd”).click(function(){ alert(“namaste is clicked”);});
});

Child Filters:
First child –used to select first child of parent  $(“:first-child”)
Last child- used to select last child of parent $(“:last-child”)
Nth child- used to select nth child of parent $(“:nth-child(n|even|odd)”)
Only child- used to select which has only child of parent $(“:only-chlid”)

<body>
<div class=”D1” >
<h1 id=”head1”>vanakam</h1>
<h1>namaste<h1>
<h1>namaskar<h1>
</div>	$(document).ready(fucntion(){
$(“.D1 h1:first-child”).click(function(){ alert(“vanakam is clicked”);});
$(“.D1 h1:last-child”).click(function(){ alert(“namaskar is clicked”);});
$(“.D1 h1:nth-child(even)”).click(function(){ alert(“namaste is clicked”);}); 
$(“.D1 h1:only-child”).click(function(){ alert(“this will not display, it is not only child”);});
})


Content Filters:
Contains- used to select element that contain specified data  $(“:contains(text)”)
Empty- used to select which does not have any child or tect
Has- used to select which has atleast one element matching selector $(“:has(selector)”)
Parent- used to select whichc has atleast one child element $(“:parent”)
<body>
<div class=”D1” >
<h1 id=”head1”>good morning</h1>
<h1>good night<h1>
<h1>good afternoon<h1>
<h2></h2>
</div>	$(document).ready(function(){
$(“.D1 h1:contains(good)”).click(function(){alert(“good is clicked”)});
$(“.D1 h2:empty”).click(function(){alert(“it is empty”)});
$(“.D1:has(h1)”).click(function(){alert(“D1 has H1”)};
$(“.D1:parent”).click(function(){alert(“D1 is parent of h1”);)};
});


Visisbility Filters:
Hidden- select all element which are hidden $(“:hidden”)  <display:none>  // intha elements matum click pana matum work aagum
Visible- select all element which are visible $(“:visible”)       


Events:
Click    $(“selector”).click(function());   response when user click an element
DoubleClick  $(“selector”).dbClick(function());
MounseEnter    $(“selector”).mouseEnter(function());
MouseLeave   $(“selector”).mouseLeave(function());
MouseOver   $(“selector”).mouseOver(function());
MouseOut    $(“selector”).mouseOut(function());
MouseDown   $(“selector”).mouseOut(function());
MouseUp  $(“selector”).mouseOut(function());
MouseMove  $(“selector”).mouseOut(function());
Hover    $(“selector”).mouseOut(function()); when cursor enter and leaves an element
Focus     $(“selector”).mouseOut(function());  if cursor active to form 
Blur 	$(“selector”).mouseOut(function());   if cursor unactive to form 
Keyup	$(“selector”).mouseOut(function());
Keydown	$(“selector”).mouseOut(function());
Keypress	$(“selector”).mouseOut(function()); response when user press or release key
Bind	$(“selector”).mouseOut(function());  one or more event handlers attached to element

HTML dom Manipulation:


Basic
Addclass- used to add a style class  .addclass()
Hasclass- used to check whether given class exist or not .hasClass()
Removeclass- used to remove a class .removeClass()    //if no paramter given it will remove all classes 
<body>
<h1>vanakam</h1>
<h2>namaste</h2>
</body>	$(document).ready(function(){
$(“h1”).click(function(){ $(“h2”).addclass(“c1 c2”);});
$(“h1”).click(function(){ $(“h2”).hasclass(“c1 c2”);});
$(“h1”).click(function(){ $(“h2”).removeclass(“c1”);});

$(“h1”).click(function(){ $(“<h2>namaskar</h2>”).replaceAll(“h1”);});
$(“h1”).click(function(){ $(“h1” ).replaceWith(“<h4>namaskar</h4>”)   });}); });


Replace methods
Replace all- used to replace new content to all selected element   $(content).replaceAll(selector)
Replace with- used to replace the new content to only selected element  $(selector).replaceWith(content)

Insert methods:




Insert inside: 
Append- $(“selecter”).append(“content”)             content will add at end
Appendto- $(“content”).appendTo(“selecter”)    same as append, only syntax different
Prepend- $(“ selecter”).perpend(“content”)           content will add at beginning
Prependto- $(“content”).prependTo(“selecter”)	same as prepend only syntaxx different
Html:  $(“ selecter”).html(“content”)  used to set or get new HTML elements 
Css:  $(“ selecter”).css(“preoperty”:”value”)  used to set or get new CSS elements 
Text   $(“ selecter”).text(“content”)   used to set or get text inside html element
Values   $(“ selecter ”).val(“content”)   used to set or get value for selected elements
<body>
<div style=”background-color:yellow”>
<h1>muthu<h1>
</div>
</body>	$(document).ready(function(){
$(“h1”).click(function(){ $(“h1”).append(“rajesh”);}); 
$(“h1”).click(function(){  $(“h1”).appendTo(“rajesh”);});
$(“h1”).click(function(){  $(“h1”).prepend(“sri);});
$(“h1”).click(function(){  $(“h1”).prependTo(“sri”);});
$(“h1”).click(function(){  $(“h1”).html(“<b>name<b>”);  });
$(“h1”).click(function(){   $(“h1”).text(“name”);  });
});


Insert around:
Wrap   $(“ selecter”).wrap(“content”)  used to wrap new elements around each specified element
WrapAll  $(“ selecter”).wrapAll(“content”) used to wrap new elements around all specified elements
UnWrap  $(“ selecter”).unwrap(“content”) used to unwrap existinf elements around specified element
WrapAll  $(“ selecter”).wrapInner(“content”) used to wrap inner child content including tedxt around new element
<body>
<h1>sri<h1>
<h1>rajesh<h1>
</body>	$(document.ready(function(){
$(“h1”).click(fucntion(){  $(“h1”).wrap(“<div></div>”);});
$(“h1”).click(fucntion(){  $(“h1”).wrapInner(“<p>muthu</p>”);});
$(“h1”).click(fucntion(){  $(“h1”).unwrap(“<p>muthu</p>”);});
$(“h1”).click(fucntion(){  $(“h1”).wrapAll(“<div> </div>”);});           });

Insert outside
After   $(“element”).after(“content”) insert content after specified content
InsertAfter- $(“content”).insertAfter(“selector”);   //same operation as .after
Before  $(“element”).before(“content”) insert content before specified content
InsertBefoe  $(“content”).InsertBefore(“selector”);

Copy
Clone    $(“selector”).clone().appendTo(“another selector”);

Css Dom Manipulation:
Css:  $(“ selecter”).css(“property”:”value”)  used to set or get new CSS elements 
Width:  $(“selecter”).width()  gives element width
Height: $(“selecter”).height() give element hight
Innerwidth: $(“selecter”).innerWidth()  return element width along with padding width
InnerHeight: $(“selecter”).innerHeight() return element heiight along with padding height
OuterWidth  $(“selecter”).outerWidth()  current width, padding width, border, margin(if u give true in bracket)
OuterHeight  $(“selecter”).outerHeight()  current height, padding height, border, margin(if u give true in bracket)
Offset:   $(“selecter”).offset({top:value, left:value}) used to set element based on xy axis coordinates

Jquery UI







Importing jquery UI :       <script src=”jquery-ui-1.11.4.js”></script>
Interactions
Draggable     $(“selector”).draggable(options)   used to drag any dom element
  
$(document).ready(funtion()
{$(“h1”).draggable({
axis:”x”,
containment:”h1”,
opacity:0.6,
revert:true,
create:function(){$(“h1”).text(dragabble object created”);},
start:function(){alert(“started dragabble”);},
drag:function(){$(“h1”).text(“dragging under process”);},
stop.function(){$(“h1”).text(“stopped dragging”);}
});});

Droppable:  $(“selector”).drobbable(options)   used to drop any dom element
  
Resizable:   :  $(“selector”).resizable(options)   used to resize any dom element
 
Selectable:    :  $(“selector”).selectable(options)   used to select any dom element 

Sortable:    $(“selector”).sortable(options)   used to sort any dom element 

Widgets:
Accordian
  
