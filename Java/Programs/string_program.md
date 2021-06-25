<details>
<summary>1. Reverse sentence words </summary>
<p>
  
```
public static void main(String args[]){
    String input = "my name is Rajesh";
    String[] inputArr = input.split(" ");
    String output="";
    for(int i=inputArr.length-1; i>=0; i--){
        if(i<inputArr.length) output+=" "; 
        output+=inputArr[i];
    }
    System.out.println(output);
}
```
</p>
</details>  
