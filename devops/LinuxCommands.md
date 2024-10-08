# Linux Commands

1. [Basic Commands](#basic-commands)
2. [Folder and Directory Commands](#folder-and-directory-commands)
3. [File Commands](#file-commands)
4. [Variable Operations](#variable-operations)
5. [File Permissions](#file-permissions)
6. [Checksum and File Integrity Commands](#checksum-and-file-integrity-commands)
7. [File Compression](#file-compression)
8. [Process Management](#process-management)
9. [Software Installation](#software-installation)
10. [Additional Commands](#additional-commands)


> Linux commands are case sensitive

## Basic commands 

| Command   | Description |
| ----------| ----------- |
| who am i	| 	show the user| 
| clear     | 		to clear screen| 
| cal		| 	shows calender| 
| cal 7 2018	| 	shows particular month| 
| cal feb 2018  | shows particular month| 
| date 		| 	print date details| 
| date ‘+DATE:%m-%y%nTIME:%H:%M:%S’| print date in given format | 

## Folder and Directory Commands

| Command   | Description               |
| ----------| ------------------------- |
| pwd		| to view path directory    |  
| ls 		| list directoryt           | 
| la -l		| detail list               | 
| ls -a		| view all files (with hiddden files)| 
| ls -la	| view all files in list view| 
| ls >list.txt	| 	save that list content in a text file| 
| cd..		| back                      | 
| cd name	| enter in to a directory   | 
| mkdir name| make directory            | 
| rmdir name| remove directory          | 

## File Commands 

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

## Variable Operations

| Variable Command | Description |
| ----------- | ----------- |
| echo 			| 	print as it give next to it| 
| name=rajesh		| 	it becomes| 
| $name			| 	will give rajesh// syntax| 


## File Permission

1. `read = r`
2. `write = w`
3. `execute = x`

User (`u`), Group (`g`), Others (`o`)(everyone)  
Use `chmod 0+w filename` to add write permission.  
For example, 754 means:

- 7 for User (`u`) - all permissions (read, write, execute)
- 5 for Group (`g`) - read and execute permissions
- 4 for Others (`o`) - read only.

```chmod 754 filename``` is the syntax.

| File Command | Description          |
|--------------|----------------------|
| 4            | stands for read      |
| 2            | stands for write     |
| 1            | stands for execute   |
| 0            | stands for no        |
| 7            | stands for all above |

### Checksum and file integrity commands:

| Command                             | Description                                                      |
|-------------------------------------|------------------------------------------------------------------|
| `sha256sum <filename>`              | Generates a SHA-256 checksum for the file (to verify integrity).  |
| `cat <filename> `|` grep <checksum>`  | Checks if a file matches a specific checksum.                    |


### File compression

| Command                             | Description                                      |
|-------------------------------------|--------------------------------------------------|
| `gzip <filename>`                   | Compresses a file using gzip.                    |
| `gunzip <filename>.gz`              | Decompresses a .gz file.                         |
| `tar cvf <archive.tar> <file1> <file2>` | Compresses multiple files into a .tar archive.   |
| `tar xvf <archive.tar>`             | Extracts files from a .tar archive.              |

### Process Management

| Command                 | Description                                                   |
| ----------------------- | ------------------------------------------------------------- |
| `ctrl + z`              | Suspends the current process (move to background).            |
| `fg`                    | Brings the suspended process to the foreground.               |
| `top`                   | Shows real-time system process activity and resource usage.    |
| `ps aux`                | Displays detailed information about all running processes.     |
| `kill <pid>`            | Terminates a process by its process ID (PID).                 |

### Software Installation

| Command                            | Description                                               |
| ----------------------------------- | --------------------------------------------------------- |
| `sudo apt-get install <package_name>` | Installs a new software package.                         |
| `sudo apt-get update`               | Updates the package lists for upgrades and new packages.  |
| `sudo apt-get remove <package_name>` | Uninstalls a software package.                           |
| `<software_name> --version`         | Checks the version of installed software.                |

## Additional Commands

| Command           | Description                                        |
| ----------------- | -------------------------------------------------- |
| `df -h`           | Displays disk space usage in human-readable format. |
| `du -sh <directory>` | Shows the size of a directory.                   |
| `ifconfig`        | Displays network configuration (IP addresses, etc.).|
| `ping <hostname/IP>` | Sends network packets to test connectivity.     |
