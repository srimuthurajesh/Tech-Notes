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

## Valid Palindrome
A phrase is a palindrome if, after converting all uppercase letters into lowercase letters and removing all non-alphanumeric characters, it reads the same forward and backward. Alphanumeric characters include letters and numbers.  
Given a string s, return true if it is a palindrome, or false otherwise.  

 
```
Input: s = "A man, a plan, a canal: Panama"   Output: true
Input: s = "race a car" Output: false
```
```java
class Solution {
    public boolean isPalindrome(String s) {
        int left=0; int right=s.length()-1;
        while(left<right){
            char currFirst = s.charAt(left);
        	char currLast = s.charAt(right);
            if(!Character.isLetterOrDigit(currFirst)){
                left++;
            } else if(!Character.isLetterOrDigit(currLast)){
                right--;
            } else {
                if(Character.toLowerCase(currFirst) != Character.toLowerCase(currLast)){
                    return false;
                }
                left++;
                right--;
            }
        }
        return true;
    }
}   
```