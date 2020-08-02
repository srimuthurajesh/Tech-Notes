## GIT  
-version Control System (VCS)  
-Source control System(SCM)  

git –version	 

**Git config:**  
git config --global user.name "srimuthurajesh"    #*gloabl keyword use while we need to apply this username for all repo*
git config --global user.email "srimuthurajesh@gmail.com"  
git config –list  

git init < directory >	#to make given folder git
git clone < url >       #get local copy from repo  
git add < directory/fileName >   			//save this point in time
git commit -m ""this is our first comment"
git status     	//to know status
git log			//commited history
git diff			//looking for different between staging and working copy
git diff --staged 	//difference between working and respository
git diff branchname1 branchname2
git diff commithash 1 commithash2




git init –base 	//important for remote respo

git checkout <url> 		//use to return back when the changes are not */added

git remote add origin /path or<url>
git remote rm origin		//to remove current origin
git push origin master
git pull				//update

git commit -am ""this is out first comment"		//moving directly to staging

git rm –cached .		//remove entire folder from tracking
git rm –cached index.html    // it wil not delete file, just it stop tracking the file

git rm filename	//remove file from staging
git reset –hard		//move to last commit given, 
git reset HEAD	//reset to recent changes r


BRANCHING:
git branch   			//to know the current branch
git branch branch_name	// create a branch
git checkout -b branch_name	//shifts to branch to branch
git checkout --force branch_name 	//shifts when code are not yet commited
git merge branch_name	//merge to current branch
git branch –d branch_name	// delete branch
git branch –D branch_name	//force delete branch while it not merged yet
git diff branch_name		//comparing branches
git diff commit_hashcode1 comit_hashcode2	//compare two commits

GIT STASH:
git stash commit stash_name		//temporary commit, but it is not actual commit
git stash list			//list the  stashes in branch 
git stash apply stash_code	//now the stash will apply or used
git stash pop			//recent stash will apply or used
git stash clear			//remove all stash
git stash drop stash_codeid	//remove specified stash


GIT TAGS:
git tag –a tagname –m “message”
git tag –l		//list tags
git show tagname	//to show current tag
git tag –d tagname	//delete tag

GIT PATCH: a text file, git diff along with code
git format-patch –stdout master>branch
git am patchfilename.patch 	//apply patch
git am –signoff patchfilenam.patch	// add username


git help	//list
git help topic_name

pwd 	// git folder

git log --author="srimu"     //list only srimuthurajesh's comments

working copy > staging area > respositary


RENAMING FILE is nothing but remove old file and adding new file name
git mv filename.txt filename2.txt                //move 
git mv filename.txt foldername/filename2.txt //move to new folder

git checkout -- filename.html    //undo changes old version back from respositary
git reset HEAD filename.html    //undo file back to unstage from working area

git checkout commitcode -- filename	// move to previous versions based on code
git remote add srimuthurajesh http://github.com/srimuthurajesh

git remote
git push -u nickname master    //push project to respository, it will ask for usename password

**To make git terminal colorful**:  
git config --global color.branch auto  
git config --global color.diff auto  git config --global color.branch auto  
git config --global color.branch auto  

