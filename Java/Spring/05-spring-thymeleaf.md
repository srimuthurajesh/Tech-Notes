> Template engine

### Depdendiceies
```
<dependency>
    <groupId>org.springframework.boot</groupId>
    <artifactId>spring-boot-starter-thymeleaf</artifactId>
</dependency>
```

#### Controller
```
package com.example.contact.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class ContactController {

    @GetMapping("/contact")
    public String showContactForm(Model model) {
        List<User> userlist = new ArrayList<>();
		userlist.add(new User("rajesh","rajeshemai.com"));
		userlist.add(new User("fdsfsd","rajeshemai.com"));
		model.addAttribute("userlist",userlist);
        
        return "contact";
    }

    @PostMapping("/contact/submit")
    public String submitContactForm(@RequestParam String name, 
                                    @RequestParam String email,
                                    @RequestParam String subject,
                                    @RequestParam String message,
                                    Model model) {
        // Process the form submission (e.g., save to database, send email, etc.)
        
        // Add an attribute to the model to show a success message
        model.addAttribute("successMessage", "Your message has been sent successfully!");
        
        // Return the contact view with the success message
        return "contact";
    }
}

```

#### Template
```
<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" th:href="@{/css/style.css}" />
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>

    <main>
        <!-- Display the greeting message -->
        <p th:text="${greetingMessage}"></p>

        <!-- Display the success message if present -->
        <p th:if="${successMessage}" th:text="${successMessage}" style="color: green;"></p>

        <form th:action="@{/contact/submit}" method="post">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div>
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required />
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div>
                <button type="submit">Send</button>
            </div>
        </form>
    </main>
    <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr th:each="user :  ${userlist}">
                   <!--  <td th:text="${user.name}"></td>
                    --> <td th:text="${user.email}"></td>
                </tr>
            </tbody>
        </table>
    <footer>
        <p>&copy; 2024 Your Company</p>
    </footer>
</body>
</html>

```