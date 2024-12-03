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