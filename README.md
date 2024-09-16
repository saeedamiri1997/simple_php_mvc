

# Simple php MVC
This is a simple PHP MVC project that provides an API for retrieving hierarchical data (tree structure) from a MySQL database.

## Installation and Setup
1. **Clone the repository**
   ```bash
   git clone https://github.com/saeedamiri1997/simple_php_mvc.git
   ```

2. **Database Setup**  
   Create a MySQL database and import the SQL file (if provided) to set up the table. The table should have the following structure:
   ```sql
   CREATE TABLE your_table_name (
       id INT PRIMARY KEY AUTO_INCREMENT,
       name VARCHAR(255),
       parent_id INT NULL
   );
   ```

   Example data:
```sql

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `name`, `parent_id`) VALUES
(1, 'Books', NULL),
(2, 'Novels', 1),
(3, 'Scientific', 1),
(4, 'Files', NULL),
(5, 'Audio', 4);


--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

   ```

3. **Run the Project**
   - Start a local server using PHP from the `public` directory:
   ```bash
   php -S localhost:8000 -t public
   ```
   - Open your browser or API client (Postman, Insomnia) and access the following URL:
   ```
   http://localhost:8000/menu
   ```
