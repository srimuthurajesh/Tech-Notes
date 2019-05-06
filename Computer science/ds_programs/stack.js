/**USING LINKED LIST**/
class Node{
	constructor(value){
		this.value=value;
		this.next=null;
	}
}
class Stack{
	constructor(){
		this.top=null;
		this.bottom=null;
		this.length=0;
	}
	peek(){
		return this.top;
	}
	push(value){
		const newNode = new Node(value);
		if(this.length===0){
			this.top=newNode;
			this.bottom=newNode;
		}else{
			const holdingPointer = this.top;
			this.top=newNode;
			this.top.next=holdingPointer;
		}
		this.length++;
		return this;
	}
	pop(){
		if(!this.top)
			return null;
		this.top=this.top.next;
		this.length--;
		return this;	
	}	
}
const myStack = new Stack();
myStack.push('google');
myStack.push();
myStack.pop('bing');

/**USING ARRAY**/
class stack{
	constructor(){
		this.array=[];
	}
	peek(){
		this.array[array.length-1];
		return this;
	}
	push(value){
		this.array.push(value);
		return this;
	}
	pop(){
		this.array.pop();	
		return this;
	}
}
const myStack = new Stack();
mystack.push('google');
mystack.push('bing');
mystack.pop();
mystack.peek();


