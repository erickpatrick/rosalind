def palindrome?(sentence)
  sentence.downcase!.gsub!("\s", "").upcase!
  sentence == sentence.reverse
end