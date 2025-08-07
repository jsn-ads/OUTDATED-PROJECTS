import { useState } from 'react';
import { SafeAreaView, StyleSheet, StatusBar, Text, Button, View} from 'react-native';

export default function App() {

  // States

  const [name, setName] = useState('');
  const [lastName, setLastName] = useState('');
  const [showOptions, setShowOptions] = useState(true);

  //functions 

  const handleButtonOne = () =>{
    setName('Cristina');
    setLastName('Monik');
  }

  const handleButtonTwo = () =>{
    setName('José');
    setLastName('Neto')
  }

  const handleButtonOptions = () =>{
    setShowOptions(!showOptions);
  }

  // APP

  return (
      <SafeAreaView>

        <StatusBar barStyle="light-content"backgroundColor="#FFF"/>

        <Text style={styles.title}>TwoThirteenApp</Text>

        <Text style={styles.subitle}>Meu nome é {name} {lastName}</Text>
        
        {showOptions &&

           <View style={styles.box}>

              <Button 
                title='Mudar para Cristina Monik'
                onPress={handleButtonOne}
              />
    
              <Button 
                title='Mudar para José Neto'
                onPress={handleButtonTwo}
              />
 
           </View>

        }

        <Button 
          title={showOptions ? 'Ocultar' : 'Visualizar'}
          onPress={handleButtonOptions}
        />
        
      </SafeAreaView>
  );
}

// CSS

const styles = StyleSheet.create({
  title:{
    fontSize:24,
    color: '#FF0000',
    textAlign : 'center'
  },
  subitle:{
    fontSize:19,
    color : '#999999',
    textAlign: 'center',
    marginTop: 50,
    marginBottom: 50
  },
  button:{
    padding : 10,
    margin : 10
  },
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  box:{
    borderColor: '000000',
    borderStyle : 'dotted',
    borderWidth : 2,
    margin : 10,
    padding : 10 
  }
});
