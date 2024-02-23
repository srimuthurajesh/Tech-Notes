# Linux Commands

> Linux commands are case sensitive

| Command | Description |
| ----------- | ----------- |
| who am i	| 	show the user| 
| clear 	| 		to clear screen| 
| cal		| 	shows calender| 
| cal 7 2018	| 	shows particular month| 
| cal feb 2018  | shows particular month| 
| date 		| 	print date details| 
| date ‘+DATE:%m-%y%nTIME:%H:%M:%S’| print date in given format | 

| Folder Command | Description |
| ----------- | ----------- |
| pwd		| 	to view path directory| 
| ls 		| 	list directoryt| 
| la -l		| 	detail list| 
| ls -a		| 	view all files (with hiddden files)| 
| ls -la	| 		view all files in list view| 
| ls >list.txt	| 	save that list content in a text file| 
| cd..		| 	back | 
| cd name	| 	enter| 
| mkdir name	| 	make directory| 
| rmdir name	| 	remove directory| 

| File Command | Description |
| ----------- | ----------- |
| touch filename,txt		| create a file| 
| rm name			| remove a file| 
| //if space come in name 	| muthu\ rajesh.txt   // it does not form as two separate files| 
| cp filename1 filename2	| copy	| 
| mv filename1 filename2	| move| 
| just give tab			| autofill|
| grep requiredword file.txt	| search word in file|
| diff file1.txt file2.txt	| compare two files|
| passwrd			| password|

| Variable Command | Description |
| ----------- | ----------- |
| echo 			| 	print as it give next to it| 
| name=rajesh		| 	it becomes| 
| $name			| 	will give rajesh// syntax| 



#### File permission
1. read=r
2. write=w
3. execute=x

user(u) groups(g) diffuser(o)(everyone)  
```chmod 0+w filename -add w function```  
for ex// 754, in this order u,g,o               //chmod 754 filename//syntax

| File Command | Description |
| ----------- | ----------- |
| 4 | stands for read| 
| 2 | stands for write| 
| 1 | stands for execute| 
| 0 | stands for no| 
| 7 |  stands for all above| 

| File Command | Description |
| ----------- | ----------- |
shalsum filename   		-to verify internet file using checksum
filename | grep verifynumber 

| Zip Command | Description |
| ----------- | ----------- |
| gzip filename 	| 				-to compress file| 
| gunzip filename.gz 	| 			-to extract it| 
| tar cvf foldername.tar file1name file2name  | 	-for group compression in same folder| 
| tar xvf foldername.tar		|                	-for group extraction from same folder| 

ctrl+z 			-escape  

### Install Software in Linux
sudo apt-get install software_name	-to install the program  
sudo apt-get update software_name	-to update the program  
sudo apt remove software_name 	-to uninstall the program  
software_name –version		-to find the version of installed software  

