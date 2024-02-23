# Git  

> Git is a Version Control System (VCS) and Source Control System (SCM).

#### Checking Git Version:
git –version

### Git Configuration
| Description | Command |
| ----------- | ----------- |
| Set global username |  ```git config --global user.name "srimuthurajesh"```| 
| Set global email |  ```git config --global user.email "srimuthurajesh@gmail.com"```| 
| View configuration |  ```git config --list```| 

### Git Initialization
| Description | Command |
| ----------- | ----------- |
| Initialize a directory for Git |  ```git init directory``` | 
| Clone a repository |  ```git clone url``` | 


### Basic Operations:
| Description | Command |
| ----------- | ----------- |
| Add file(s) to staging |  ```git add directory/fileName ```| 
| Remove file from staging |  ```git rm --cached directory/fileName``` | 
| Commit changes |  ```git commit -m "This is our first comment"``` | 
| Check repository status |  ```git status``` | 
| View commit history | ```git log``` | 
| View last 10 commits | ```git log --oneline -10``` | 

### Difference Viewing:
| Description | Command |
| ----------- | ----------- |
| between staging and working copy | ```git diff```|
| between working copy and repository | ``` git diff --staged```|
| between branches |  ```git diff branchname1 branchname2```|
| between commits |  ```git diff commit_hashcode1 commit_hashcode2```|

### Branching:
| Description | Command |
| ----------- | ----------- |
| Create a branch |  ```git branch branch_name``` | 
| Switch to a branch |  ```git checkout -b branch_name``` | 
| Merge a branch | ```git merge branch_name``` | 
| Delete a branch |  ```git branch -d branch_name``` | 
| Force delete a branch |  ```git branch -D branch_name``` | 
| Compare branches |  ```git diff branch_name``` | 
| Compare commits |  ```git diff commit_hashcode1 commit_hashcode2``` | 


### Stashing:
| Description | Command |
| ----------- | ----------- |
| Temporarily stash changes   |  ```git stash commit stash_name```|
| List stashes                 |  ```git stash list```|
| Apply a stash               |  ```git stash apply stash_code```|
| Apply the most recent stash |  ```git stash pop```|
| Clear all stashes |  ```git stash clear```|
| Remove a specific stash |  ```git stash drop stash_codeid```|

### Tags:
| Description | Command |
| ----------- | ----------- |
| Create a tag |  ```git tag -a tagname -m "message"``` | 
| List tags |  ```git tag -l``` | 
| Show a tag |  ```git show tagname``` | 
| Delete a tag |  ```git tag -d tagname``` | 

### Remote Operations:
| Description | Command |
| ----------- | ----------- |
| Add a remote repository| ``` git remote add nickname http://github.com/username```| 
| Push to a repository|  ```git push -u nickname master```| 

### Git Workflow and Staging Process
> Working copy -> staging area -> repository



