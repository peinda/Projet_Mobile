import {Injectable, Injector} from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor, HttpClient, HttpErrorResponse, HttpResponse
} from '@angular/common/http';
import {from, Observable, throwError} from 'rxjs';
import {Storage} from '@ionic/storage';
import {catchError, map, switchMap} from 'rxjs/operators';

@Injectable()
export class InterceptorInterceptor implements HttpInterceptor {

  constructor(private injector: Injector, private storage: Storage) {}

  intercept( request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    // console.log('ok');
    return from (this.storage.get('token'))
      .pipe(
        switchMap(token => {

          if (token !== null) {
            request = request.clone({ headers: request.headers.set('Authorization', 'Bearer ' + token) });
          }
          return next.handle(request).pipe(
            map((event: HttpEvent<any>) => {
              if (event instanceof HttpResponse) {
                return event;
              }
              return;
            }),
            catchError((error: HttpErrorResponse) => {
              return throwError(error);
            })
          );
        })
      );
  }
}
