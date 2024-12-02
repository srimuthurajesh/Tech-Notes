# String

## Valid paranthesis
Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.

```
Input: s = "()"  Output: true
Input: s = "()[]{}"  Output: true
Input: s = "(]"   Output: false
Input: s = "([])"  Output: true
```
```java
class Solution {
    public boolean isValid(String s) {
        Stack<Character> stack = new Stack<>();

        for(char c: s.toCharArray()){
            if(c=='(' || c=='{' || c=='[')
                stack.push(c);
            else {
                if(stack.isEmpty()){
                    return false;
                }
                char top = stack.peek();
                if((c==')' &&  top=='(') || 
                    (c=='}'  &&  top=='{') ||
                        (c==']' &&  top=='[')){
                    stack.pop();
                } else {
                    return false;
                } 
            }
        }
        return  stack.size()==0;
    }
}
```