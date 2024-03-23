# VIM

## Installation
> sudo apt-get install vim-gnome  

## Modes
1. Insert mode -> press i  
2. normal mode -> press escape  
3. Exit -> press : and q for exit


## Navigation
> HJKL

| Command | Description |
| ----------- | ----------- |
| k | top| 
| l | right| 
| j | down| 
| h | left| 


## Search 
> /searchtext - then type request word, press enter
/\csearchtext - case insensitive

| Command | Description |
| ----------- | ----------- |
| n |  go to next word| 
| N |  go to previous word| 
| \ |  escape character while search text entering| 
| * |  go to next next occurance of current word| 
| # |  go to previous occurance of current word| 


## Advanced Navigation:
| Command | Description |
| ----------- | ----------- |
| w |  next word begining | 
| b |  previous word beginning| 
| e |  end of current word, or end of next word| 
| gg |  start of the file| 
| G |  end of the file| 
| fa |  find next 'a' fi - find next 'i'| 
| Fa |  find previous 'a'| 
| % |  { } goes to matching brace | 
| 0 |  beginning of the current line, eventhough empty space| 
| ^ |  beginning of the current line, at only to first word| 
| $ |  end of the current line| 
| I |  insert mode at beginning of the line| 
| A |  insert mode at ending of the line| 

Note: use number to multiply navigations  6fa  will go 6th 'a'



## File Operations:
| File Command | Description |
| ----------- | ----------- |
| :enew 			|  new file| 
| :w filename.txt	|  to save file| 
| :w 				|  to save changes| 
| :q |  exit (while no changes occur)| 
| :q! |  exit without saving(while changes occur)| 
| :e filename.txt  |  open file| 

## Undo Redo:
| Command | Description |
| ----------- | ----------- |
| u |  undo| 
| ctrl r |  redo| 
| x |  delete key operation while in normal mode| 
| X |  backspace key operation while in normal mode| 
| dd |  delete current line| 

## Copy Paste:
| Command | Description |
| ----------- | ----------- |
| v |  visual mode, select text| 
| V |  visual mode, select entire line| 
| y |  copy| 
| d |  cut| 
| p |  paste|  
| yy |  copy current line| 
| dd |  cut current line| 

## Replace
| Command | Description |
| ----------- | ----------- |
| /%s/oldword/newword/g |  replace word in whole file| 
| /%s/oldword/newword/gi |  replace word in whole file| 
| /%s/oldword/newword |  replace word in whole file but first occurance in line| 
| /s/oldword/newword  |  replace only one word| 
| /s/oldword/newword/g  |  replace words in current line| 

## Spilt:
| Command | Description |
| ----------- | ----------- |
| :sp		|  to enter new colon mode | 
| :vsp	|  to enter vertical spilt mode| 
| :spilt	|  to enter new colon mode| 
| ctrl w and j |  swift between colon by j and k | 
| :close	|  close current split| 
| ctrl w and n |  change to horizontal spilt| 
| ctrl w and v |  change to vertical spilt| 
| ctrl w and c |  close the spilt| 
| ctrl ww |  toggle spilt screen| 


> create .vim folder and .vimrc file in home

