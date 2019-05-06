class Node{
	constructor(value){
		this.value=value;
		this.left=null;
		this.right=null;
	}
}
class BsearchTree{
	constructor(){
		this.root=null;
	}
	insert(value){
		const newNode = new Node(value);
		if(this.root==null){
			this.root=newNode;
			return this;
		}	
		var currentNode = this.root;
		while(true){
			if(currentNode.value<value){
				if(currentNode.right==null){
					currentNode.right=newNode;
					break;	
				}
				currentNode=currentNode.right;
			}else if(currentNode.value>value){
				if(currentNode.left==null){
					currentNode.left=newNode;	
					break;
				}
				currentNode=currentNode.left;
			}					
		}
		return this;	
	}
	lookup(value){
		if(this.root==null){
			return false
		}
		var currentNode = this.root;
		while(currentNode){
			if(currentNode.value<value)
				currentNode=currentNode.right;
			else if(currentNode.value>value)
				currentNode=currentNode.left;	
			else if(currentNode.value==value)
				return true;
		}
		return false;
	}
}

const bSearchTree = new BsearchTree();
bSearchTree.insert(4);
console.log("root ok");
bSearchTree.insert(1);
bSearchTree.insert(2);
bSearchTree.insert(3);


