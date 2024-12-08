## Easy
### Fine Second Largest element

```java
public class LargestNumber {
    public static void main(String[] args) {
        int[] arr = {5, 3, 8, 4, 2, 7, 1};
        System.out.println("Original array:");
        int max = findLargestNumber(arr);
        System.out.println("The largest number is: " + max);
        System.out.println("The Second number is: " + findSecondLargestNumber(arr));
    }
    private static int findSecondLargestNumber(int[] arr) {
        int firstLargest = arr[0];
        int secondLargest = 0;
        for (int i = 1; i < arr.length; i++) {
            if (arr[i] > firstLargest) {
                secondLargest = firstLargest;
                firstLargest = arr[i];
            } else if (arr[i] > secondLargest) {
                secondLargest = arr[i];
            }
        }

        return secondLargest;
    }
    private static int findLargestNumber(int[] arr) {
        int max = arr[0];
        for (int i = 1; i < arr.length; i++) {
            if (arr[i] > max) {
                max = arr[i];
            }
        }

        return max;
    }
}

```
---
## Two Sum
Given an array of integer nums and an integer target, return indices of the two numbers such that they add up to the target.  
You may assume that each input would have exactly one solution,and you may not use the same element twice.
You can return the answer in any order.
```
Input: nums = [2,7,11,15], target = 9  
Output: [0,1]  
Explanation: Because nums[0] + nums[1] == 9, we return [0, 1].  
```
```java
class Solution {
    public int[] twoSum(int[] nums, int target) {
        Map<Integer, Integer> tempMap = new HashMap<Integer, Integer>();
        for(int i=0;i<nums.length;i++){
            if(tempMap.get(nums[i])!=null){
                return new int[]{tempMap.get(nums[i]), i};

            }
            tempMap.put(target-nums[i], i);
        }
        return new int[2];
    }
}
```
---
## Best Time to Buy and Sell Stock
You are given an array of prices where prices[i] is the price of a given stock on an ith day.  
You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.  
Return the maximum profit you can achieve from this transaction.  
If you cannot achieve any profit, return 0

```
Input: prices = [7,1,5,3,6,4]  Output: 5  
Explanation: Buy on day 2 (price = 1) and sell on day 5 (price = 6),  profit = 6-1 = 5.  
```
```java
class Solution {
    public int maxProfit(int[] prices) {
        int min=prices[0];
        int res=0;
        for(int i=1;i<prices.length;i++){
            if(min>prices[i])
                min = prices[i];
            if(res<(prices[i]-min))
                res = prices[i]-min;    
        }
        return res;
    }
}
```
--- 
## Contains Duplicate
Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.  
 
```
Input: nums = [1,2,3,1]   Output: true  
Explanation: The element 1 occurs at the indices 0 and 3.  
```
```java
class Solution {
    public boolean containsDuplicate(int[] nums) {
        Set<Integer> set = new HashSet<Integer>();
        for(int num:nums){
            if(!set.add(num)){
                return true;
            }
        }
        return false;       
    }
}
```

---
## Product of Array Except Self

```java
class Solution {
    public int[] productExceptSelf(int[] nums) {
        int[] result = new int[nums.length];
        result[0] = nums[0];
        for (int i = 1; i < nums.length; i++) {
            result[i] = nums[i] * result[i - 1];
        }
        int temp;
        result[nums.length - 1] = result[nums.length - 2];
        temp = nums[nums.length - 1];
        for (int j = nums.length - 2; j > 0; j--) {
            result[j] = result[j - 1] * temp;
            temp = temp * nums[j];
        }
        result[0]=temp;
        return result;
    }
}
```
---
## Find Minimum in Rotated Sorted Array
Given the sorted rotated array nums of unique elements, return the minimum element of this array.  
You must write an algorithm that runs in O(log n) time.  
```
Input: nums = [3,4,5,1,2]  Output: 1  
Explanation: The original array was [1,2,3,4,5] rotated 3 times.  
```
```java
class Solution {
    public int findMin(int[] nums) {
        int min = nums[0];
        for(int i=1;i<nums.length;i++){
            if(nums[i]<nums[i-1]){
                return nums[i];
            }
        }
        return min;
    }
}
```

## Container With Most Water
```java
class Solution {
    public int maxArea(int[] height) {
       
        int leftIndex = 0;
        int rightIndex = height.length-1;
        int maxCapacity = 0;
        while(leftIndex<rightIndex){
            int minHeigth = Math.min(height[leftIndex],height[rightIndex]);
            int tempMaxCapacity = minHeigth*(rightIndex-leftIndex);
            if(tempMaxCapacity>maxCapacity){
                maxCapacity = tempMaxCapacity;    
            }
            //we are reducing distance between leftindex and rightindex based on its height
            if(height[leftIndex]<height[rightIndex]){
                leftIndex++;
            } else {
                rightIndex--;
            }
        }
        

        return maxCapacity;
    }
}
```
