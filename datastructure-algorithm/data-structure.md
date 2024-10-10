# Data Structures

- [Array](#array)
- [Linked list](#linked-list)
- [Stack](#stack)
- [Queue](#queue)
- [Priority Queue](#priority-queue)
- [Tree](#tree)
  - [Types of Traversals](#types-of-traversals)
  - [Types of Binary Trees](#types-of-binary-trees)
- [Heap](#heap)
- [Hash](#hash)
- [Graph](#graph)
- [Advance Data Structures](#advance-data-structures)
  - [XOR Linked list](#xor-linked-list)



# Overview
> different ways of storing data  

## Array:
> Collection of similar items in continuos memory location

## Linked list:
1. single
2. Double
3. Circular

## Stack:
> linear data structure which follows a particular order LIFO or FILO.  

Operations:  
1. push
2. pop
3. peek
4. isempty   
Note: we can implement using array and linkedlist

## Queue:
> linear data structure which follows a particular order LIFO or FILO. 

Operations:
1. enqueue
2. dequeue
3. front
4. rear
**priotity queue**: uses max heap, comparator arguement
Operations:
1. insert
2. getHighestPriority
3. deleteHighestPriority

## Tree:
> non linear datastruture, undirected graph.

Teminologies: root, node, leaf, level, width, depth, height, degree  

**Types of Representation :**   
1. Sequential   
2. Array    
left child position - 2i+1,right child position - 2i+2, parent position - (i-1)/1, max number of nodes in height = (2^h+1)-1

**Types of Travesals:**  
1. Inorder(L/Ro/R)
2. Preorder(Ro/L/R)
3. Postorder(L/R/Ro)

**Types of deletion:** 
1. inorder predecessor(replace root with largest element in left side)  
2. inorder successor(replace root with lowest element in right side)  

**Tree Types**:
1. Full/proper/strict Btree - should have two/zero children  
2. Complete Btree - last level as left as possible  
3. Perfect Btree all the leaf at same level  
4. Degenerate Btree - all nodes having only one child  

**Types of Binary trees:**  
1. **Binary tree**: Each node can have maximum two children.  
2. **Binary search tree** : Binary tree in which left node should less, right node should high  
3. **AVL tree** : self balanced tree. maintain Balance factor = {-1,0,1}  
4. **Red Black tree** : not aggressive self balancing   
  root should be black, no adjacent continuos red node, new node always red    
  if we face adjacent red nodes then check parent sibling,    
  a)if it is black, then realign, exchange color for resligned nodes  
  b)if it is red, then recolor parent&sibling to black, recheck againt it parent's parent, if it is (black && not a root) change to red.   
  if u will face adjacent red nodes means again continue adjacent conditions.
       
5. **Splay tree** :  self balanced tree with recently accessed elements are as root.  
6. **B tree** : this try to reduce the height of tree, thus multiple key in root node, called m value.
  a) must have m/2 children, b)minimum two parent key 3)all leaf at same level  
7. **B+ tree** : each parent key has duplicate at leaf node 

# Heap:
> specialized tree structure with heap property

1. MinHeap
2. MaxHeap

# Hash:
> searching technique, key field value is converted to address location  

**Types of Hashing**  
1. Open hashing (closed addressing)  
  a) Chaning method - uses Linked list
2. Closed hashing (opern addressing)  
  a) Linear probing - insert next free location (u+i)%10), save formula count as probe  
  b) quadratic probing - insert free location of (u+i^2)%10), save formula count as probe 
  c) double hashing - do another hashing(v), then insert free location (u+v* i)%10), save formula count as probe
3. Division method(i % m)   

# Graph:
> collection of nodes(vertices) which connected between edges  

**complete graph:** all nodes conneced together(formula = n(n-1)/2)  
**Terminoloy**:
1. length = no of edges
2. cost =  sum of weight at each node
3. cyclic = path start and ends in same node
4. acyclic = contains no cycle


## Advance Data structures:

### XOR Linked list:
### 

