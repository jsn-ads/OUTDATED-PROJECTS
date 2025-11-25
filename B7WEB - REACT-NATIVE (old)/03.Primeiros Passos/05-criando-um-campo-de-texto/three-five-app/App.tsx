import React,{useState} from 'react';
import {StyleSheet, TextInput, Text} from 'react-native';
import { SafeAreaProvider, SafeAreaView } from 'react-native-safe-area-context';

export default function App() {

  // STATES
  const [title, setTitle] = useState('Three Five App');
  const [name, setName] = useState('');

  // FUNCTIONS
  const handleClear = () => {
    setTitle('');
  }

  // APP
  return (
    
    <SafeAreaProvider>
      <SafeAreaView
        style={{flex:1}}
      > 
        <Text style={styles.title}>
          {title}
        </Text>

        <TextInput
          style={{backgroundColor: '#EEE', padding:10}}
          placeholder="Digite seu nome"
          placeholderTextColor="#999"
          value={name}
          onChangeText={text => setName(text)}
        />

        <Text>
          valor : {name}
        </Text>


      </SafeAreaView>
    </SafeAreaProvider>

  );
}

// CSS
const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#FFF',
    alignItems: 'center',
    justifyContent: 'flex-start',
    paddingTop:30
  },
  title:{
    color:'#FF0000',
    fontSize:20,
    fontWeight:'bold',
    textAlign:'center'
  },
  button:{
    backgroundColor: '#007BFF',
    paddingVertical: 10,
    paddingHorizontal: 20,
    borderRadius: 8,
    marginVertical: 5
  },
  buttonText:{
    color: '#FFF',
    fontSize: 16,
    fontWeight: 'bold',
    textAlign: 'center'
  }
});

