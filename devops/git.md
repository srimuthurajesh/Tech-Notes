# Git  

1. [Introduction](#Introduction)
2. [Checking Git Version](#checking-git-version)
3. [Git Configuration](#git-configuration)
4. [Git Initialization](#git-initialization)
5. [Basic Operations](#basic-operations)
6. [Difference Viewing](#difference-viewing)
7. [Branching](#branching)
8. [Rebasing](#rebasing)
9. [Merging](#merging)
10. [Cherry-picking](#cherry-picking)
11. [Reset](#reset)
12. [Stashing](#stashing)
13. [Tags](#tags)
14. [Remote Operations](#remote-operations)
15. [Git Workflow and Staging Process](#git-workflow-and-staging-process)

#### Introduction
> Git is a Version Control System (VCS) and Source Control System (SCM).

#### Checking Git Version:
`git –version`

### Git Configuration

| Description           | Command                                                       |
| --------------------- | ------------------------------------------------------------- |
| Set global username   |  `git config --global user.name "srimuthurajesh"`             | 
| Set global email      |  `git config --global user.email "srimuthurajesh@gmail.com"`  |  
| View configuration    |  `git config --list`                                          | 

### Git Initialization

| Description                       | Command               |
| --------------------------------- | --------------------- |
| Initialize a directory for Git    |  `git init directory` | 
| Clone a repository                |  `git clone url`      | 


### Basic Operations:

| Description                           | Command                                       |
| ------------------------------------- | --------------------------------------------- |
| Add file(s) to staging                | `git add directory/fileName`                  | 
| Remove file from staging              | `git rm --cached directory/fileName`          | 
| Commit changes                        | `git commit -m "This is our first comment"`   | 
| Check repository status               | `git status`                                  | 
| View commit history                   | `git log`                                     | 
| View last 10 commits                  | `git log --oneline -10`                       | 
| Amend the last commit with new changes| `git commit --amend`                          |
| Amend only the commit message         | `git commit --amend -m "new message"`         |


### Difference Viewing:  

| Description                           | Command                                       |
| ------------------------------------- | --------------------------------------------- |
| between staging and working copy      | `git diff`                                    |
| between working copy and repository   | ` git diff --staged`                          |
| between branches                      |  `git diff branchname1 branchname2`           |
| between commits                       |  `git diff commit_hashcode1 commit_hashcode2` |

### Branching:

| Description           | Command                                       |
| --------------------- | --------------------------------------------- |
| Create a branch       | `git branch branch_name`                      | 
| Switch to a branch    | `git checkout -b branch_name`                 | 
| Merge a branch        | `git merge branch_name`                       | 
| Delete a branch       | `git branch -d branch_name`                   | 
| Force delete a branch | `git branch -D branch_name`                   | 
| Compare branches      | `git diff branch_name`                        | 
| Compare commits       | `git diff commit_hashcode1 commit_hashcode2`  | 

### Rebasing:
Rebasing allows you to move or combine a sequence of commits to a new base commit.

| Description                        | Command                            |
|------------------------------------|------------------------------------|
| Start a rebase                     | `git rebase branch_name`           |
| Abort a rebase                     | `git rebase --abort`               |
| Continue after fixing conflicts    | `git rebase --continue`            |
| Skip a commit during rebase        | `git rebase --skip`                |
| Rebase interactively               | `git rebase -i commit_hashcode`    |

### Merging:
Merging integrates changes from one branch into another.

| Description                  | Command                    |
|------------------------------|----------------------------|
| Merge a branch               | `git merge branch_name`    |
| Abort a merge                | `git merge --abort`        |
| View merge conflict details  | `git diff` (after a conflict) |

### Cherry-picking:
Cherry-picking allows you to apply specific commits from one branch into another.

| Description                   | Command                              |
|-------------------------------|--------------------------------------|
| Apply a specific commit       | `git cherry-pick commit_hashcode`    |

### Reset:
The reset command moves the branch pointer and optionally modifies the working directory or index.

| Description                        | Command                                |
|------------------------------------|----------------------------------------|
| Soft reset (keeps changes staged)  | `git reset --soft commit_hashcode`     |
| Mixed reset (unstages changes)     | `git reset --mixed commit_hashcode`    |
| Hard reset (discards changes)      | `git reset --hard commit_hashcode`     |


### Stashing:

| Description                   | Command                       |
| ----------------------------- | ----------------------------- |
| Temporarily stash changes     |  `git stash commit stash_name`|
| List stashes                  |  `git stash list`             |
| Apply a stash                 |  `git stash apply stash_code` |
| Apply the most recent stash   |  `git stash pop`              |
| Clear all stashes             |  `git stash clear`            |
| Remove a specific stash       |  `git stash drop stash_codeid`|

### Tags:

| Description   | Command                           |
| ------------- | --------------------------------- |
| Create a tag  |  `git tag -a tagname -m "message"`| 
| List tags     |  `git tag -l`                     | 
| Show a tag    |  `git show tagname`               | 
| Delete a tag  |  `git tag -d tagname`             | 

### Remote Operations:  

| Description                           | Command                                               |
| ------------------------------------- | ----------------------------------------------------- |
| Add a remote repository               | ` git remote add nickname http://github.com/username` | 
| Push to a repository                  |  `git push -u nickname master`                        | 
| Fetch changes from a remote branch    | `git fetch origin`                                    |
| Fetch changes from all remotes        | `git fetch --all`                                     |

### Git Workflow and Staging Process
> Working copy -> staging area -> repository



