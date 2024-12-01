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