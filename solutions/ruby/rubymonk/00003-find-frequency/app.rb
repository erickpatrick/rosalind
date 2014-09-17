def find_frequency(sentence, word)
  sentence.downcase.split.count(word.downcase)
end