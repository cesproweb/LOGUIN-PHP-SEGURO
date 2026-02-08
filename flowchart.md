```mermaid
flowchart TD

A[User enters username & password] --> B{User exists?}
B -- No --> Z[Show error: Invalid credentials]

B -- Yes --> C{Account locked?}
C -- Yes --> L[Show error: Account locked]

C -- No --> D{Password correct?}
D -- No --> E[Increase attempts by 1]
E --> F{Attempts >= 5?}
F -- Yes --> G[Lock account]
G --> H[Show error: Account locked]
F -- No --> I[Show error: Wrong password]

D -- Yes --> J[Reset attempts to 0]
J --> K[Start session: user_id, username, role]
K --> R{Role = admin?}
R -- Yes --> S[Redirect to dashboard with admin menu]
R -- No --> T[Redirect to dashboard with user menu]
