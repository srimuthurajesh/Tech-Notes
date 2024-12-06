# List

## Reverse a Linked List 

```java
/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode() {}
 *     ListNode(int val) { this.val = val; }
 *     ListNode(int val, ListNode next) { this.val = val; this.next = next; }
 * }
 */
class Solution {
    public ListNode reverseList(ListNode head) {
        ListNode resultNode = null;
        while(head!=null){
            resultNode = new ListNode(head.val,resultNode);
            head = head.next;
        }
        return resultNode;
    }
}
```

## Detect cycle in a Linked List
```java
/**
 * Definition for singly-linked list.
 * class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode(int x) {
 *         val = x;
 *         next = null;
 *     }
 * }
 */
public class Solution {
    public boolean hasCycle(ListNode head) {
        if(head==null || head.next==null){
            return false;
        }
        ListNode slow = head;
        ListNode fast = head;
        while(fast!=null && fast.next!=null){
            fast = fast.next.next;
            slow = slow.next;
            if(slow==fast){
                return true;
            }
        }
        return false;
    }
}
```

## Merge Two Sorted List
```java
/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode() {}
 *     ListNode(int val) { this.val = val; }
 *     ListNode(int val, ListNode next) { this.val = val; this.next = next; }
 * }
 */
class Solution {
    public ListNode mergeTwoLists(ListNode list1, ListNode list2) {
        ListNode resultListNode = new ListNode(-1);
        ListNode currentNode = resultListNode;
        
        while(list1!=null || list2!=null){
            if(list1!=null && (list2==null || list1.val<=list2.val)){
                currentNode.next = list1;
                list1= list1.next;
            } else if(list2!=null) {
                currentNode.next = list2;
                list2= list2.next;
            }
            currentNode = currentNode.next;  
        }
        return resultListNode.next;
    }
}
```

## Remove Nth Node From End Of List
```java
/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode() {}
 *     ListNode(int val) { this.val = val; }
 *     ListNode(int val, ListNode next) { this.val = val; this.next = next; }
 * }
 */
class Solution {
    public ListNode removeNthFromEnd(ListNode head, int n) {
        if(head.next==null && n>0){
           return head.next;     
        }
        ListNode currentNode = head;
        ListNode temp = head;
        int initialCounter=0;
        int endCounter=0;
        while(currentNode!=null){
            if(initialCounter>n){
                temp = temp.next;
            } 
            initialCounter++;     // 1  2 3
            currentNode = currentNode.next; //1-index //2-index
        }
        if(initialCounter==n){
            head=head.next;
        } else {
            temp.next = temp.next.next;
        }
        return head;
    }
}
```